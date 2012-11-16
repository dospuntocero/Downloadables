<div class="clear"></div>
<div class="container">
  <div class="grid_1-5">
    <% include ClientsLoginForm %>
  </div>
  <div class="grid_4-5" id="siteContent">
    <div class="content typography">
      <h1>$Title</h1>
      <% if Level(2) %><p>$Breadcrumbs</p><% end_if %>
        <% include MainImage %>
        $Content

        <table id="archivos">
          <tbody>
            <% loop Children %>
              <tr>
                <td colspan="2"><h3>$Title</h3></td>
              </tr>
              <% loop CategorizedFiles %>
              <tr>
                <td>
                  <img src="$File.Icon" />
                  <span>$Title</span>
                </td>
                <td>
                  <a href="$File.URL">Descargar</a>
                </td>
              </tr>
              <% end_loop %>
            <% end_loop %>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
